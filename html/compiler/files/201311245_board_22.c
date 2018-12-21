#include<stdio.h>
#include<stdlib.h>

typedef struct Setnode *Spoint;
typedef struct Setnode{
	int key;
	Spoint parent, member;
};

Spoint tail[2];
int i = 0;
void make_set(int x);
Spoint find_set(int x, int i);
void Union(int x, int y);
int main()
{
	int x, y;
	Spoint tt;
	x=10;
	y=20;
	make_set(x);
	printf("make %d\n", x);
	make_set(y);
	printf("make %d\n", y);
	Union(x,y);
	printf("Union x,y : ");
	for(tt=tail[0]->parent; tt; tt=tt->member)
		printf("%d->", tt->key);
	printf("\n");
	y=30;
	make_set(y);
	printf("make %d\n", y);
	Union(x, y);
	
	printf("Union x,y : ");
	for(tt=tail[0]->parent; tt; tt=tt->member)
		printf("%d->", tt->key);
	printf("\n");
	
	return 0;
}
void make_set(int x){
	Spoint temp;
	temp= malloc(sizeof(*temp));
	temp->key = x;
	temp->parent = temp;
	temp->member = NULL;
	tail[i++] = temp;
}
Spoint find_set(int x, int i){
	Spoint head = tail[i]->parent;
	while(head){
		if(head->key==x)
			return head;
		else
			head=head->member;
	}
	return NULL;
}

void Union(int x, int y)
{
	Spoint head, front, prev,temp, f1, f2;
	f1 = find_set(x, 0);
	f2 = find_set(y, 1);
	head = f1->parent;
	temp = f2->parent;
	front = temp;
	while(temp){
		temp->parent=head;
		prev = temp;
		temp=temp->member;
	}
	tail[0] = prev;
	while(head){
		prev = head;
		head = head->member;
	}
	prev->member = front;
	i--;
}
