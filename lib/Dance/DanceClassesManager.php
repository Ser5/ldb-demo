<?php

namespace Dance;

class DanceClassesManager
{
    public const TYPE_ID_LEADER   = 1;
    public const TYPE_ID_FOLLOWER = 2;


    public function __construct(private array $db)
    {
    }



    public function get(int $id): DanceClass
    {
        if (!isset($this->db['classes'][$id])) {
            throw new \InvalidArgumentException("Class $id not found");
        }

        $classData = $this->db['classes'][$id];

        $class = new DanceClass(
            $id,
            $classData['capacity'],
            $classData['leaders'],
            $classData['followers']
        );

        return $class;
    }



    /**
     * @return DanceClass[]
     */
    public function getList(): array
    {
        $list = [];
        foreach (array_keys($this->db['classes']) as $classId) {
            $list[] = $this->get($classId);
        }
        return $list;
    }



    public function addStudent(int $classId, array $studentData): Result
    {
        $r = $this->validate($classId, $studentData);

        if ($r->isOK) {
            if ($studentData['type_id'] == static::TYPE_ID_LEADER) {
                $this->db['classes'][$classId]['leaders'][] = $studentData['name'];
            } else {
                $this->db['classes'][$classId]['followers'][] = $studentData['name'];
            }
        }

        return $r;
    }



    private function validate(int $classId, array $studentData): Result
    {
        //var_dump($classId, $studentData);
        $errorMessage = '';

        do {
            $classData = $this->db['classes'][$classId] ?? null;
            if (!$classData) {
                $errorMessage = "Class $classId doesn't exist";
                break;
            }

            $studentData['name']    = trim($studentData['name'] ?? '');
            $studentData['type_id'] = $studentData['type_id']   ?? 0;

            if (!$studentData['name']) {
                $errorMessage = "Name required";
                break;
            }

            if (!$studentData['type_id'] or !in_array($studentData['type_id'], [static::TYPE_ID_LEADER, static::TYPE_ID_FOLLOWER])) {
                $errorMessage = "Invalid type ID: $studentData[type_id]";
                break;
            }

            $leadersCount   = count($classData['leaders']);
            $followersCount = count($classData['followers']);

            if ($leadersCount + $followersCount == $classData['capacity']) {
                $errorMessage = "Sorry, no places left";
                break;
            }

            if ($studentData['type_id'] == static::TYPE_ID_LEADER and ($leadersCount - $followersCount) == 2) {
                $errorMessage = "Leaders limit exceeded";
                break;
            }

            if ($studentData['type_id'] == static::TYPE_ID_FOLLOWER and ($followersCount - $leadersCount) == 2) {
                $errorMessage = "Followers limit exceeded";
                break;
            }
        } while (false);

        return new Result($errorMessage);
    }
}
