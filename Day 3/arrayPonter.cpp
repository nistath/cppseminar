#include <iostream>
using namespace std;

void editArray(int ARR[], int size, int set){
    for(int i=0; i<size/2; i++){
        ARR[i]=set;
    }
}

void printArray(int ARR[], int size){
    for(int i=0; i<size; i++){
        cout<<ARR[i]<<" ";
    }
    cout<<"\n";
}

int main(){
    int n;
    cin>>n;

    int arr[n] = {};

    printArray(arr, n);

    editArray(arr, n, -9);

    printArray(arr, n);

    cout<<arr[2]<<" "<<arr[3];

    return 0;
}
