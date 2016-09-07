#include <iostream>
using namespace std;

int freqCount(int array[], int size){
    int freq[101] = {};

    int max=0, maxI=0;

    for(int i=0; i<size; i++){
        int content = array[i];
        freq[ content ]++;

        if(freq[ content ]>max){
            max = freq[ content ];

            maxI = content;
        }
    }

    return maxI;
}

int main(){
    int n;
    cin>>n;

    int array[n];

    for(int i=0; i<n; i++){
        cin>>array[i];
    }

    cout<<freqCount(array, n);

    return 0;
}
