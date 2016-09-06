#include <iostream>
using namespace std;

double avgArray(int A[], int n){
    int sum;

    for(int i=0; i<n; i++){
        sum += A[i];
    }

    return sum/n;
}

int main(){
    int n;

    cin>>n;

    int A[n];

    for(int i=0; i<n; i++){
        cin>>A[i];
    }

    cout<<"Average is: "<<avgArray(A, n);
    return 0;
}
