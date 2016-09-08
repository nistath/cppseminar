#include <iostream>
#include <algorithm>

using namespace std;

int fib(int n){
    cout << n << endl;
    if(n == 1) return 1;
        else return fib(n - 1) + fib(n - 2);
}

int main(){
    cout << fib(6);
    return 0;
}
