<?php

/**
 * Classe para inserir valores no banco de dados
 */
class Ler extends ConexaoBD {

    private $Select;
    private $Links;
    private $Result;

    /**
     * @var atributo usado para armazenar query preparada
     * PDO statement
     */
    private $Ler;

    /**
     * @var PDO
     */
    private $ConexaoPDO;

    /**
     * Método usado para para realizar uma consulta genérica ao banco de dados
     * @param [STRING] $Tabela = Nome da tabela de consulta
     * @param [STRING] $Termos = WHERE Nome_Coluna = :Nome AND Nome_Coluna2 = :Nome2 LIMIT :limit
     * @param [STRING] $Links = link={$link}&link2={$link2}&...
     */
    public function LerBD($Tabela, $Termos = Null, $Links = Null) {
        if (!empty($Links)) {
            parse_str($Links, $this->Links);
        }
        $this->Select = "SELECT * FROM {$Tabela} {$Termos}";
        $this->Executar();
    }

    /**
     * Retorna o resultado da Inserir
     */
    public function getResult() {
        return $this->Result;
    }
    
    /**
     * Retorna o número de consultas
     * @return [INT]
     */
    public function getRowCount() {
        return $this->Ler->rowCount();
    }
    
    /**
     * Função usada para executar uma leitura manual no banco de dados
     * @param [STRING] $Query = Query manual para leitura da tabela
     * @param [STRING] $Links = link={$link}&link2={$link2}&...
     */
    public function LeituraManual($Query, $Links = null) {
        $this->Select = (string) $Query;
          if (!empty($Links)) {
            parse_str($Links, $this->Links);
        }
        $this->Executar();
    }
    
    /**
     * Altera manualmente os valores dos links
     * OBS: Os valores precisam ser identicos à quantidade de links
     * @param [STRING] $Links = link={$link}&link2={$link2}&...
     */
    public function AlterarLinks($Links) {
        parse_str($Links, $this->Links);
        $this->Executar();
    }

    /* ==================================================================
     * ================= Métodos privados de auxilio a classe =====================
     * ================================================================== */

    /**
     * [ConectarPDO MÉTODO usado para conectar-se à PDO]
     */
    private function ConectarPDO() {
        $this->ConexaoPDO = parent::getConexao();
        $this->Ler = $this->ConexaoPDO->prepare($this->Select);
        $this->Ler->setFetchMode(PDO::FETCH_ASSOC);
    }

    /**
     * Cria a syntax responsável por enviar conteúdo pada o banco de dados
     */
    private function Syntax() {
        if ($this->Links) {
            foreach ($this->Links as $vinculo => $value) {
                if ($vinculo == 'limit' || $vinculo == 'offset') {
                    $value = (int) $value;
                }
                $this->Ler->bindValue(":{$vinculo}", $value, ( is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR));
            }
        }
    }

    /**
     * [Executar executa a query]
     */
    private function Executar() {
        $this->ConectarPDO();
        try {
            $this->Syntax();
            $this->Ler->execute();
            $this->Result = $this->Ler->fetchAll();
        } catch (\PDOException $e) {
            MsgErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die();
        }
    }

}
