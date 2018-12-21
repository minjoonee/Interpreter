#include<stdio.h>

void SWAP(int* a, int* b); // 스왑 해주는 함수 
void quicksort(int A[], int p, int r); // 퀵소트 
int partition(int A[], int p, int r); // X에 대하여 헤쳐모여! 


int main(void)
{
	int i, A[100]; // 값을 넣어줄 A 배열 100개 선언 
	for (i=0; i < 100;  i++ )
   	 if (i%2) 
		A[i] = (100-i)*3+1;
   	 else A[i] = i * 2 + 1;
    
    quicksort(A,0,99); // 퀵소트 함수 호출 
    
    for(i=0; i<100; i++)
    	printf("%d ",A[i]); // 출력 
    	
    printf("\n");
    return 0;
}
void quicksort(int A[], int p, int r) // 퀵소트 
{
	int q; // 분할 지점정해줄 값 선언 
	if(p<r)
	{
		q = partition(A,p,r); // 반으로 분할. q로 헤쳐모여 
		quicksort(A,p,q-1); // 왼쪽 part1 다시 분할 
		quicksort(A,q+1,r);	 // 오른쪽 part2 다시 분할 
	}
}

int partition(int A[], int p, int r) // 분할. x를 기준으로 헤쳐모여 
{
	int i=p-1, x=A[r]; // 리턴해줄 i와 맨 뒤의 값인 x선언 
	int j;
	
	for(j=p; j<r; j++)
		if(A[j]<=x)  // A[j] 가 x보다 작거나 같을 때 값을 바꿔줌 
			SWAP(&A[++i], &A[j]); // x보다 큰값을 뒤로 작은값을 앞으로 
			
	SWAP(&A[++i], &A[r]); // 맨 마지막에 X였던 A[r]를 중간으로 땡겨와줌 
	
	return i; // 중간값을 리턴해줌. 
}

void SWAP(int* a, int* b)  // 스왑을 위한 함수 
{
	int temp;
	temp = *a;
	*a = *b;
	*b = temp;
}											