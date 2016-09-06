#include <iostream>
using namespace std;

void printNumber(int a){
    cout<<a;
    return ; // Can't return!
}

int main() {
    int n;
    cin>>n;

    printNumber(n);
    return 0;
}
