<?php

namespace Dance;

class ConsoleInterface
{
    public function __construct(private string $templatesDirPath)
    {
    }



    public function showClassesList(array $classesList)
    {
        $this->showTemplate('classes_list', compact('classesList'));
    }



    public function readInput(array $classesList): array
    {
        $minClassId = $classesList[0]->id;
        $maxClassId = $classesList[count($classesList) - 1]->id;

        return $this->showTemplate('input_form', compact('minClassId', 'maxClassId'));
    }



    public function showInputResult(Result $r)
    {
        $this->showTemplate('input_result', compact('r'));
    }



    private function showTemplate(string $templateName, array $vars = []): array
    {
        $templateOutputData = [];
        extract($vars);
        require "$this->templatesDirPath/$templateName.php";
        return $templateOutputData;
    }
}
