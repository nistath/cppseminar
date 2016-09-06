#include <iostream>
using namespace std;

int main(){
    int N;

    cout << "How many people ate pizza? ";
    cin >> N;

    int slices[N]; // Cell i contains how many slices the person with name i+1 ate. ex. If person 1 ate 5, slices[0]=5.

    int max = -1; // Set max to -1 so that
    int maxEater; // The name of the person that ate the most.

    for(int i=1; i<=N; i++){ // From 1 up to N.
        cout << "How many slices did person " << i << " eat? ";
        cin >> slices[i-1]; // Person 1 stored in index 0, 2 in index 1 and so on...

        if(slices[i-1] > max){
            max = slices[i-1];
            maxEater = i;
        }
    }

    cout << "Person " << maxEater << " ate the most!\n";

    for(int i=0; i<N; i++){ // Iterate through 0 up to N-1.
        cout << "Person " << i+1 << " ate " << slices[i]/8.0 << " ";

        if(slices[i]>8){
            cout << "pizzas!\n";
        }
        else{
            cout << "pizza!\n";
        }
    }

    return 0;
}
