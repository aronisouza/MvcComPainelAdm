<?php
// Classe pai CRUD
abstract class CRUD extends Conexao {
    protected string $Tabela;
    protected array $Places = [];
    protected bool $Result;
    
    protected PDO $Conn;
    protected PDOStatement $Stmt;
    protected string $Query;

    // Conexão PDO
    protected function Connect(): void {
        $this->Conn = parent::getConn();
    }

    // Executa query
    protected function Execute(): void {
        $this->Connect();
        try {
            $this->Stmt = $this->Conn->prepare($this->Query);
            $this->Stmt->execute($this->Places);
            $this->Result = true;
        } catch (PDOException $e) {
            $this->Result = false;
            logError("Erro PDO: {$e->getMessage()}");
            fldAlertaPersonalizado(
                "Erro",
                "<b>Erro ao executar ação no banco:</b><br /> Mensagem: {$e->getMessage()}",
                'danger',
                'OK'
            );
        }
    }

    public function getResult(): bool {
        return $this->Result;
    }

    public function getRowCount(): int {
        return $this->Stmt->rowCount();
    }

    // Define placeholders extras
    public function setPlaces(string $ParseString): void {
        parse_str($ParseString, $this->Places);
    }

    // Validação básica de tabela
    protected function validateTable(): void {
        if (empty($this->Tabela)) {
            throw new Exception("Nome da tabela não pode ser vazio.");
        }
    }
}
