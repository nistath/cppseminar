#include <iostream>
using namespace std;

void line(int i, int n){
    for(int space = 0; space < i; space++){
        cout<<" ";
    }

    for(int ast = 0; ast < n - 2*i; ast++){
        cout<<"*";
    }
}

void triangle(int n){
    cout<<"\n";

    for(int i=0; i<n; i++){

        line(i, n);

        cout<<"\n";
    }

    return;
}

int main(){
    int a;
    cin>>a;

    triangle(a);

    return 0;
}
