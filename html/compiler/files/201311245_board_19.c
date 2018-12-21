#include<stdio.h>
#include<string.h>
//기수정렬~
int main(){
	int num, i, j,push,x;
	char min, check;
	int min_num;
	char tmp[4];
	char tmpx[4];
	char arr[4][4]={
		"412",
		"002",
		"037",
		"411"
	};
	
	for(num=2; num>=0; num--){ // 첫번째 자리~ 세번째자리 
		for(i=0; i<4; i++){
		 // 소트의 시작부분~ 
		 	min_num=i;
		 	min = arr[i][num];
			for(j=i+1; j<4; j++){
				if(arr[j][num]<min){
					min_num=j;
					min=arr[j][num];
					strcpy(tmp, arr[j]);
					for(x=0; x<4; x++){
						if(x!=j&&min==arr[x][num]){
							check=x+1;
							break;
						}
						check=0;
					}
					for(push=j; push>check; push--){
						strcpy(arr[push],arr[push-1]);
					}
					strcpy(arr[push],tmp);
				}
			}
		}
	}


	for(x=0; x<4; x++)
		printf("%s\n", arr[x]);
	printf("\n");
	
	return 0;
}