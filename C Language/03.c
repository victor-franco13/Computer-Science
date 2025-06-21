#include <stdio.h>
#include <stdlib.h>

int main(){
    //operadores relacionais
    >
    >=
    <
    <=
    ==
    !=

    //operadores lógicos
    && Operardor "E"
    || Operador "OU"

    //forma geral
    expressão "operador lógico" expressão

    //resultaado da operação
    0: a operação é falsa
    1: a operação é verdadeira

    //operador lógico
    ! Operador "NEGAÇÃO"

    //forma geral
    !(expressão)

    //resultado da operação
    0: se a expressão valer 1
    1: se a expressão valer 0

    //Tabela Verdade
    A  B  !A  !B  A&&B  A||B
    0  0   1   1   0     0
    0  1   1   0   0     1
    1  0   0   1   0     1
    1  1   0   0   1     1

    /*O comando if:
    permite executar ou não um conjunto de
    comandos de acordo com uma condição*/

    //Forma geral
    if (condição){
        conjunto de comandos
    }
    /*O comando else:
    permite executar um segundo conjunto de
    comandos a condição do comando if for falsa*/
    //Forma geral
    if (condição){
        Primeiro conjunto de comandos
    }else{
        Segundo conjunto de comandos
    }

}