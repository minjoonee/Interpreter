#include<stdio.h>
void bSort(int A[], int n);
void SWAP(int *a, int *b);
int main(){
	int A[5] = {30, 20, 15, 11, 24};
	int n=5;
	int i;
	
	//printf("sort num : ");
	for(i=0; i<n; i++)
		scanf("%d",&A[i]);
	printf("\n");
	bSort(A, n);
	
	//printf("sort complete num : ");
	for(i=0; i<n; i++)
		printf("%d ",A[i]);
	//printf("\n");
	
	return 0;
}
void bSort(int A[], int n){
	int last, i;
	for(last=n-1; last>0; last--)
		for(i=0; i<last; i++)
			if(A[i]>A[i+1])
				SWAP(&A[i], &A[i+1]);
}
void SWAP(int *a, int *b){
	int temp;
	temp = *a;
	*a = *b;
	*b = temp;
}