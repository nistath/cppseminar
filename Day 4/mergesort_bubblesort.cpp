#include <iostream>
using namespace std;

void merge(int A[], int B[], int szA, int szB, int S[]){
    int i = 0, j = 0, k =0;
    while(i < szA && j < szB){
        if(A[i] < B[j]){
            S[k] = A[i];
            i++;
        }
        else{
            S[k] = B[j];
            j++;
        }
        k++;
    }
    while(i < szA){
        S[k] = A[i];
        k++;
        i++;
    }
    while(j < szB){
        S[k] = B[j];
        k++;
        i++;
    }
}

void mergesort(int A[], int n){
    if(n == 1) return;
    int L[n/2], R[n - n/2];
    for(int i = 0; i < n / 2; i++){
        L[i] = A[i];
    }
    for(int i = n/2; i < n; i++){
        R[i - n / 2] = A[i];
    }
    mergesort(L, n/2);
    mergesort(R, n - n/2);

    merge(L, R, n/2, n - n/2, A);
}

void bubblesort(int A[], int n){
    for(int i = 0; i < n; i++){
      for(int j = 0; j < n - i - 1; j++){
        if(A[j] > A[j + 1]) swap(A[j], A[j + 1]);
      }
    }
}

int main(){
        int test;
        int A[102000] = {};
        for(int i = 0; i < 102000; i++) A[i] = 102000 - i;
        cin >> test;
        mergesort(A, 102000);
        cout << "mergesort is done\n";
        int B[102000];
        for(int i = 0; i < 102000; i++) B[i] = 102000 - i;
        cin >> test;
        bubblesort(B, 102000);
        cout << "bubblesort is done\n";

    //    for(int i = 0; i < 2000; i++) cout << A[i] << endl;
}
