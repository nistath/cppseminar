#include <iostream>
using namespace std;

struct result{
    int a,b;
};

bool isPrime(int n){
    if(n<2) return 0;
    if(n==2) return 1;

    for(int i=2; i<n; i++){
        if(n%i==0){
            return false;
        }
    }

    return true;
}

result Goldbach(int N) {
    for(int i=0; i<N; i++){
        if(isPrime(i) && isPrime(N-i)){
            result temp;
            temp.a = i;
            temp.b = N-i;
            return temp;
        }
    }
}

int main(){
    int N;
    cin>>N;

    result apa = Goldbach(N);
    cout<<apa.a<<" "<<apa.b;

    return 0;
}
