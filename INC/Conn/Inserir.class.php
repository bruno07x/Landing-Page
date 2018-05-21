<?php
/**
 * Classe para inserir valores no banco de dados
 */
class Inserir extends ConexaoBD
{
  private $Tabela;
  private $Dados;
  private $Result;

  /**
   * @var atributo usado para armazenar query preparada
   *PDO statement
   */
  private $Inserir;

  /**
   *@var PDO
   */
   private $ConexaoPDO;
   /**
    * Insere dados dentro de um banco, basta informar o nome da tabela e um array
    * de dados atribuitivo ('Nome_Coluna' => 'Valor')
    * @param STRING $Tabela [Nome da tabela]
    * @param ARRAY  $Dados  [Dados a serem inseridos]
    */
   public function InserirBD ($Tabela, array $Dados)
   {
     $this->Tabela = (string) $Tabela;
     $this->Dados = $Dados;
     $this->Syntax();
     $this->Executar();
   }

   /**
    * Retorna o resultado da Inserir
    */
   public function getResult()
   {
     return $this->Result;
   }

   /*==================================================================
    * ============= Métodos privados de auxilio a classe ==============
    *==================================================================*/
    /**
     * [ConectarPDO MÉTODO usado para conectar-se à PDO]
     */
    private function ConectarPDO()
    {
      $this->ConexaoPDO = parent::getConexao();
      $this->Inserir = $this->ConexaoPDO->prepare($this->Inserir);
    }

    /**
     * Cria a syntax responsável por enviar conteúdo pada o banco de dados
     */
    private function Syntax()
    {
      $Campos = implode(', ', array_keys($this->Dados));
      $Links = ':' . implode (', :', array_keys($this->Dados));
      $this->Inserir = "INSERT INTO {$this->Tabela} ({$Campos}) VALUES ({$Links})";
    }

    /**
     * [Executar executa a query]
     */
    private function Executar()
    {
      $this->ConectarPDO();
      try {
        $this->Inserir->execute($this->Dados);
        $this->Result = $this->ConexaoPDO->lastInsertId();
      } catch (PDOException $e) {
        $this->Result = Null;
        MsgErro ($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
      }

    }

}
