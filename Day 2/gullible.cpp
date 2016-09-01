#include <iostream>
using namespace std;

int main() {
    int c=0;

    while (true) {
        cout<<"Enter: "<<c<<endl;

        int temp;
        cin>>temp;

        if(temp==c){
            break;
        }

        c++;
    }

    cout<<"Good dog!";

    return 0;
}
