#include <string>
#include <iostream>
using namespace std;

int main(){
    string a="Hello! My name is Nick!";

    for(int i = 1; i<a.length(); i=i+2){
        a[i]='_';
    }

    cout<<a;
}
