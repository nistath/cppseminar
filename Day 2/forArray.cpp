#include <iostream>
using namespace std;

int main() {
    int array[5][4];

    for (int p=0; p<5; p++){
        for (int k=0; k<4; k++) {
            cout<<array[p][k]<<" ";
        }
        cout<<"\n";
    }

    return 0;
}
