/*#include <stdio.h>
#include <stdlib.h>
#include "grafo.h"

//Definição do tipo grafo
struct grafo {
    int eh_ponderado;
    int nro_vertices;
    int grau_max;    // tamanho das listas
    int** arestas;   // array de arestas
    float** pesos;
    int* grau;       // quantidade de elementos em cada lista
};

Grafo* cria_Grafo(int nro_vertices, int grau_max, int eh_ponderado){
    Grafo *gr;
    gr = (Grafo*) malloc(sizeof(struct grafo));
    if(gr != NULL){
        int i;
        gr->nro_vertices = nro_vertices;
        gr->grau_max = grau_max;
        gr->eh_ponderado = (eh_ponderado != 0)?1:0;
        gr->grau = (int*) calloc(nro_vertices,sizeof(int));
        gr->arestas = (int**) malloc(nro_vertices * sizeof(int*));
        for(i=0; i<nro_vertices; i++)
            gr->arestas[i] = (int*) malloc(grau_max * sizeof(int));

        if(gr->eh_ponderado){
            gr->pesos = (float*) malloc(grau_max * sizeof (float));
            for(i=0; i<nro_vertices; i++)
                gr->pesos[i] = (float*) malloc(grau_max * sizeof(float));
        }
    }
    return gr;
}
*/

# include < stdio .h >
# include < stdlib .h >
# include " Grafo .h" // inclui os protótipos

// Definição do tipo Grafo
struct grafo {
    int eh_ponderado ;
    int nro_vertices ;
    int grau_max ; // tamanho das listas
    int** arestas ; // array de arestas
    float** pesos ;
    int* grau ; // quantidade de elementos em cada lista
};


Grafo * cria_Grafo ( int nro_vertices , int grau_max , int eh_ponderado ) {
    Grafo * gr ;
    gr = ( Grafo *) malloc ( sizeof ( struct grafo ) ) ;
    if( gr != NULL ) {
        int i ;
        gr - > nro_vertices = nro_vertices ;
        gr - > grau_max = grau_max ;
        gr - > eh_ponderado = ( eh_ponderado != 0) ?1:0;
        gr - > grau = ( int *) calloc ( nro_vertices , sizeof (int ) ) ;
        gr - > arestas = ( int **) malloc ( nro_vertices * sizeof (int *) ) ;
    for ( i =0; i < nro_vertices ; i ++)
        gr - > arestas [ i ] = ( int *) malloc ( grau_max * sizeof (int) ) ;

    if( gr - > eh_ponderado ) {
        gr - > pesos = ( float **) malloc ( nro_vertices * sizeof ( float *) ) ;
for ( i =0; i < nro_vertices ; i ++)
gr - > pesos [ i ] = ( float *) malloc ( grau_max * sizeof ( float ) ) ;
        }
    }
    return gr ;
}