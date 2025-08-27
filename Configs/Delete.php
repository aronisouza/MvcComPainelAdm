<?php

class Delete extends CRUD {

    public function ExeDelete(string $Tabela, string $Termos, string $ParseString = ''): void {
        $this->Tabela = $Tabela;
        $this->validateTable();

        if (empty($Termos)) {
            throw new Exception("Termos (WHERE) não podem ser vazios para DELETE.");
        }

        if ($ParseString) {
            $this->setPlaces($ParseString);
        }

        $this->Query = "DELETE FROM {$this->Tabela} {$Termos}";
        $this->Execute();
    }
}
