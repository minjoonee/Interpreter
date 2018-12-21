#include<stdio.h>
#include<string.h>
#include<stdlib.h>

/*
	Xm = "q r s t u a b s f d h i j" (m=13)
	Yn = "r s t g d h t j k u v a b s" (n=14)
*/
char X[]="qrstuabsfdhij";
char Y[]="rstgdhtjkuvabs";

int LCS(int m, int n);
int max(int a, int b);

int main(){
	int result;
	int m, n;
	m=strlen(X);
	n=strlen(Y);
	result = LCS(m, n);
	/*
	result LCS array C

	0  0  0  0  0  0  0  0  0  0  0  0  0  0  0
	0  0  0  0  0  0  0  0  0  0  0  0  0  0  0
	0  1  1  1  1  1  1  1  1  1  1  1  1  1  1
	0  1  2  2  2  2  2  2  2  2  2  2  2  2  2
	0  1  2  3  3  3  3  3  3  3  3  3  3  3  3
	0  1  2  3  3  3  3  3  3  3  4  4  4  4  4
	0  1  2  3  3  3  3  3  3  3  4  4  5  5  5
	0  1  2  3  3  3  3  3  3  3  4  4  5  6  6
	0  1  2  3  3  3  3  3  3  3  4  4  5  6  7
	0  1  2  3  3  3  3  3  3  3  4  4  5  6  7
	0  1  2  3  3  4  4  4  4  4  4  4  5  6  7
	0  1  2  3  3  4  5  5  5  5  5  5  5  6  7
	0  1  2  3  3  4  5  5  5  5  5  5  5  6  7
	0  1  2  3  3  4  5  5  6  6  6  6  6  6  7
	*/
	printf("\nresult is %d\n", result);
	return 0;
}

int LCS(int m, int n){
	int i;
	int j;
	char C[m+1][n+1];
	for(i=0; i<=m; i++)
		C[i][0]=0;
	for(j=0; j<=n; j++)
		C[0][j]=0;
	
	for(i=1; i<=m; i++){
		for(j=1; j<=n; j++){
			if(X[i-1]==Y[j-1])
				C[i][j]=C[i-1][j-1]+1;
			else
				C[i][j]=max(C[i-1][j],C[i][j-1]);
		}
	}
	printf("LCS array C\n\n");
	for(i=0; i<=m; i++){
		for(j=0; j<=n; j++)
			printf("%d  ",C[i][j]);
		printf("\n");
	}
	return C[m][n];
}
int max(int a, int b){
	if(a>b)
		return a;
	else if(a<b)
		return b;
	return a;
}