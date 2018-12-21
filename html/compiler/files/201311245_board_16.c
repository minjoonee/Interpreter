#include<stdio.h>

void heapSort(int A[], int n);
void buildheap(int A[],int n);
int heapify(int A[], int k, int n);
void swap(int *x, int *y);
int main()
{
	int i, n=100;
	int A[101];
	for (i=1; i < 101;  i++ )
    if( i % 2) A[i] = (100 - i ) * 3 + 1 ;
      else A[i] = i * 2 + 1 ;
    heapSort(A, n);
    
    n=100;
    for(i=1; i<n+1; i++)
    	printf("%d ", A[i]);
    printf("\n");
    return 0;
}
void heapSort(int A[], int n)
{
	int i;
	buildheap(A, n);
	for(i=n; i>=2; i--){
		swap(&A[1], &A[i]);
		heapify(A,1, i-1);
	}
}

void buildheap(int A[],int n)
{
	int i;
	for(i=n/2; i>=1; i--)
		heapify(A,i,n);
}

int heapify(int A[], int k, int n)
{
	int left = k*2;
	int right = k*2+1;
	int max;
	if(right <= n){
		if(A[left]<A[right])
			max=right;
		else
			max=left;
	}
	else if(left <= n) 
		max = left;
	else return;
	if(A[max]>A[k]){
		swap(&A[max], &A[k]);
		heapify(A, max, n);
	}
}
void swap(int *x, int *y)
{
	int temp = *x;
	*x = *y;
	*y = temp;
}

