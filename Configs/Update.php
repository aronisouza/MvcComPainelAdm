<?php

class Update extends CRUD {
    private array $Dados;

    public function ExeUpdate(string $Tabela, array $Dados, string $Termos, string $ParseString = ''): void {
        $this->Tabela = $Tabela;
        $this->Dados = $Dados;
        $this->validateTable();

        if ($ParseString) {
            $this->setPlaces($ParseString);
        }

        $this->getSyntax($Termos);
        $this->Execute();
    }

    private function getSyntax(string $Termos): void {
        if (empty($this->Dados)) {
            throw new Exception("Dados para UPDATE não podem ser vazios.");
        }
        $set = [];
        foreach ($this->Dados as $col => $val) {
            $set[] = "{$col} = :{$col}";
        }
        $this->Places = array_merge($this->Places, $this->Dados);
        $this->Query = "UPDATE {$this->Tabela} SET " . implode(', ', $set) . " {$Termos}";
    }
}
