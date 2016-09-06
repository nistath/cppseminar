#include <iostream>
#include <string>

using namespace std;


int main(){

    int a, b, m;

    cin>>a>>b>>m;

    if(a%2!=0) a++; // If a happens to be odd, make sure to add 1 to make it even

    for(int i = a; i<=b; i=i+2){
        if(i%m!=0) cout<<i<<"\n";
    }

    cout<<"Welcome!";
    return 0;
}
