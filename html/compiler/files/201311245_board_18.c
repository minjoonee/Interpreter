#include<stdio.h>
#include<stdlib.h>
#include<string.h>
void selection_sort(int A[], int n);
void SWAP(int *a, int *b);
int main()
{
	int A[] = {35, 45, 20, 40};
	int n=4,i;
	
	printf("sort num : ");
	for(i=0; i<n; i++)
		printf("%d  ",A[i]);
	printf("\n");
	selection_sort(A,n);
	
	
	printf("sort complete num : ");
	for(i=0; i<n; i++)
		printf("%d  ",A[i]);
		
	return 0;
}
void selection_sort(int A[], int n){
	int last, i, max;
	
	for(last=n-1; last>0; last--){
		max=last;
		for(i=0; i<last; i++)
			if(A[i]>A[max]) 
				max=i;
	SWAP(&A[last],&A[max]);
	}
}

void SWAP(int *a, int *b){
	int temp;
	temp = *a;
	*a = *b;
	*b = temp;
}