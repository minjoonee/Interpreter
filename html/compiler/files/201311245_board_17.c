#include<stdio.h>

void merge(int A[], int p, int q, int r);
void mergeSort(int A[],int p, int r);
int main()
{
	int A[4] = {45, 30, 20, 25};
	int p=0, r=3, i;	
	//for(i=0; i<4; i++) printf("%d ", A[i]);
	//printf("\n\n");	
	mergeSort(A,p,r);
	

	for(i=0; i<4; i++) printf("%d ", A[i]);	
	printf("\n\n");
	return 0;
}

void mergeSort(int A[],int p, int r)
{
	int q = (p+r)/2;
	
	if(p<r)
	{
		mergeSort(A,p,q);
		mergeSort(A,q+1,r);
		merge(A,p,q,r);
	}	
}	
void merge(int A[], int p, int q, int r)
{
	int i=p; 
	int j=q+1; 
	int t=0;
	int temp[4]={0};
	while (i<=9 && j<=r)
	{
		if(A[i]<=A[j])
			temp[t++] = A[i++];
		else
			temp[t++] = A[j++];
	}
	
	while (i<=q)
		temp[t++] = A[i++];
	while (j<=r)
		temp[t++] = A[j++];
	
	for (i=p, t=0; i<=r; i++)
		A[i] = temp[t++];
}

