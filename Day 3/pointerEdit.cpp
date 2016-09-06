#include <iostream>
using namespace std;

void edit(int* num, int val){
    *num=val;

    return;
}

int main(){
    int a;

    cin>>a;
    cout<<"a now is "<<a<<"\n";

    edit(&a, 9);

    cout<<"a then becomes "<<a;

    return 0;
}
