
<?php

class Create extends CRUD {
    private array $Dados;

    public function ExeCreate(string $Tabela, array $Dados, string $ParseString = ''): void {
        $this->Tabela = $Tabela;
        $this->Dados = $Dados;
        $this->validateTable();
        if ($ParseString) {
            $this->setPlaces($ParseString);
        }
        $this->getSyntax();
        $this->Execute();
    }

    private function getSyntax(): void {
        if (empty($this->Dados)) {
            throw new Exception("Dados para INSERT não podem ser vazios.");
        }
        $cols = implode(', ', array_keys($this->Dados));
        $vals = ':' . implode(', :', array_keys($this->Dados));
        $this->Places = array_merge($this->Places, $this->Dados);
        $this->Query = "INSERT INTO {$this->Tabela} ({$cols}) VALUES ({$vals})";
    }

    public function getLastInsertId(): string {
        return $this->Conn->lastInsertId();
    }
}
