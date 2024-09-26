<?php
/*
* Classe TCriteria
* Esta classe prove uma interface utilizada para definição d criterios
*/

class TCriteria extends TExpression
{
    private $expressions; // armazena a lista de instruções
    private $operators; // armazena a lista de operadres
    private $properties; // propriedades do criterio

    // Metodo construtor
    function __construct()
    {
        $this->expressions = array();
        $this->operators = array();
    }

    /*
    * Metodo Add
    * adiciona uma expressão ao critério
    * @param $expressions = expressão (objeto TExpression)
    * @param $operator = operador lógico de comparação
    */

    public function add(TExpression $expression, $operator = self::AND_OPERATOR){
        // na primeira  vez, não precisa de operadoor lógico pra contatenar

        if(empty($this->expressions))
        {
            $operator = NULL;

        }

        // agrega o resultado da expressão a lista de expressões

        $this->expressions[] = $expression;
        $this->operators[] = $operator;
    }

    /* Metodo dump()
    * retorna a expressão final
    */

    public function dump()
    {
        // concatena a lista de expressoes

        if(count($this->expressions)>0)
        {
            $result - '';
            foreach($this->expressions as $i=> $expression)
            {
                $operator = $this->operators[$i];
                //concatena o iperador com a respectiva expressão
                $result .= $operator. $expression->dump().' ';
        }

        $result = trim($result);
        return "({$result})";
    }

}
/* Metodo SetPropriety
* define o valor de uma propriedade
* @param $property = propriedade
* @param $value = valor
*/

public function setProprerty($property, $value)
{
    if(isset($value))
    {
        $this->properties[$property] = $value;
    }
    else
    {
        $this->properties[$property] = NULL;
    }
}

/* Metodo getProperty()
* retorna o valor da propriedade
* @param $property = propridade
*/ 

public function getProprerty($property)
{
    if(isset($this->properties[$property]))
    {
      return $this->properties[$property];
    }
  }
}


?>