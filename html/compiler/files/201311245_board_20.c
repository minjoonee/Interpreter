#include<stdio.h>

int main(){
	int A[5]={30, 20, 15, 11, 24};
	int i, n=5;
	
	printf("sort num : ");
	for(i=0; i<n; i++)
		printf("%d  ",A[i]);
	printf("\n");
	
	Insert(A, n);
	
	
	return 0;
}
void Insert(int A[], int n){
	int i;
	int loc;
	int newItem;
	for(i=1; i<n; i++){
		loc = i-1;
		newItem = A[i];
		while(loc >= 0 && newItem < A[loc]){
			A[loc+1]= A[loc];
			loc = loc-1;
		}
		A[loc+1] = newItem;
	}
	printf("sort complete num : ");
	for(i=0; i<n; i++)
		printf("%d  ",A[i]);
	printf("\n");
}