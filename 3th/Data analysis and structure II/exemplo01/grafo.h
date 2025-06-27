typedef struct grafo Grafo ;
Grafo * cria_Grafo ( int nro_vertices , int grau_max , int eh_ponderado ) ;
void libera_Grafo ( Grafo * gr ) ;
int insereAresta ( Grafo * gr , int orig , int dest , int eh_digrafo , float peso ) ;
int removeAresta ( Grafo * gr , int orig , int dest , int eh_digrafo ) ;