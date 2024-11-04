<?php

namespace Dance;

class DanceClass
{
    public readonly int $leadersCount;
    public readonly int $followersCount;
    public readonly int $freePlacesCount;


    public function __construct(
        public readonly int   $id,
        public readonly int   $capacity,
        public readonly array $leaderNamesList,
        public readonly array $followerNamesList
    ) {
        $this->leadersCount    = count($leaderNamesList);
        $this->followersCount  = count($followerNamesList);
        $this->freePlacesCount = $capacity - ($this->leadersCount + $this->followersCount);
    }
}
