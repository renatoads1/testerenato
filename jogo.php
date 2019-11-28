<?php

/* 1 - Desenvolva uma classe que possua 4 atributos privados que deverão conter os
seguintes dados - Quantidade de dezenas, que deverá permitir apenas as seguintes 
opções: 6, 7, 8, 9 ou 10. - Resultado - Total jogos - Jogos */

Class Jogo {
    private $quantidadeDezenas;
    private $resultado;
    private $totalJogos;
    private $Jogos;


/*3 - Desenvolver método construtor onde 2 parâmetros serão recebidos os atributos
e consequentemente suas definições de valor:- Quantidade de dezenas - Total de jogos. */

    public function __construct($quantidadeDezenas, $totalJogos) {
        //valida se qauntidade de dezenas atende a critérios
        if($quantidadeDezenas > 5 && $quantidadeDezenas < 11 ){
            $this->setQuantidadeDezenas($quantidadeDezenas);
        }        
        $this->setTotalJogos($totalJogos);
    }    

/*2 - Desenvolver na classe anterior 2 métodos públicos GET e SET para definir os
valores dos atributos. */

    public function getQuantidadeDezenas() {
        return $this->quantidadeDezenas;
      }
      
    public function setQuantidadeDezenas($quantidadeDezenas) {
        $this->quantidadeDezenas= $quantidadeDezenas;
      }
    //_____resultado_______
    public function getResultado() {
        return $this->resultado;
    }
    
    public function setResultado($resultado) {
        $this->resultado = $resultado;
    }
    //______totalJogos_______
    public function getTotalJogos() {
        return $this->totalJogos;
    }
    
    public function setTotalJogos($totalJogos) {
        $this->totalJogos= $totalJogos;
    }
    //_____Jogos________
    public function getJogos() {
        return $this->Jogos;
    }
    
    public function setJogos($Jogos) {
        $this->Jogos= $Jogos;
    }

/* 4 - Desenvolver um método privado que retorne um array com dezenas entre 01 e 60
que respeite a cardinalidade definida pelo atributo “Quantidade de dezenas” onde as
dezenas nunca se repitam e estejam na ordem crescente.*/
    private function gerajogo() {
        //pega quantidade de dezenas 
        $quantidade = getQuantidadeDezenas();
        
        $jogo =  array();
        for($i = 0;$i <$quantidade; $i++){
            // retorna valor aleatorio entre 0 e 60
            $valor = rand(0,60);
            //verifica repetido
                if(!in_array($valor,$jogo[$i])){
                    //preenche array
                    $jogo[$i] = $valor;
                }else{
                    $i--;
                }
        }
        //ordena array em ordem cre
        $jogoOrdenado = sort($jogo);

        return $jogoOrdenado;
    }
/* 5 - Desenvolver um método publico que selecione a quantidade de jogos que está
setado no atributo “Total jogos” obtendo assim um array multidimensional onde cada
posição deste array deverá conter outro array com um jogo. Use o método anterior
para gerar cada jogo e salve este array multidimensional no atributo “Jogos”.*/
    public function salvaJogos(){
// Use o método anterior para gerar cada jogo e salve este array multidimensional no atributo “Jogos”.
        $gjogos =  gerajogo();
        setJogos($gjogos);
//Desenvolver um método publico que selecione a quantidade de jogos que está setado no atributo “Total jogos”
        $totaljogos = getTotalJogos();
//este aqui esta dificil de entender
    }

/*• 6 - Desenvolver um método público que realize o sorteio de 6 dezenas aleatórias entre
01 e 60. Os números não podem se repetir e devem estar em ordem crescente. O array 
resultante dever´a ser armazenado no atributo “Resultado”.
*/
    public function sorteio(){
        $premiado =  array();
        for($i = 0;$i < 6; $i++){
            // retorna valor aleatorio entre 0 e 60
            $valor = rand(0,60);
            //verifica repetido
                if(!in_array($valor,$premiado[$i])){
                    //preenche array
                    $premiado[$i] = $valor;
                }else{
                    $i--;
                }
        }
        //ordena array em ordem cre
        $premiadoOrdenado = sort($premiado);
        //armazena resultado
        setResultado($premiadoOrdenado);
    }
/*7 - Desenvolver um método que confere todos os jogos e retorna uma tabela HTML
que contem os jogos e quantas dezenas foram sorteadas em cada jogo.*/
    public function confere(){
        //pega os jogos salvos
        $jogos = getJogos();
        $numerosorteado  = getResultado();
        //varre o array de jogos para comparar os elementos
        $htm = "<table>";
        foreach($jogos as $key => $value){
            //retorna quantidade de numeros que estão presentes nos dois arrays
            $resultado = count(array_intersect($value,$numerosorteado));
            //monta a tabela html com os valores
            $htm .="<tr>";
                foreach($value as $k => $v){
                    $htm .="<td>".$v;
                    $htm .="</td>";
                }
            $htm .="<td colspan='".$k."'>Números Sorteados".$resultado."</td></tr>";
        }
        $htm .="</table>";

        return $htm;
    }
}
?>