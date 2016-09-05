#include <iostream>
using namespace std;

int main(){
    int N;
    cout<<"1-Water\n2-Cola\n3-Soda\n4-Juice\n";
    cout<<"Choose a beverage: ";

    cin>>N;

    switch(N){
        case 1:
            cout<<"Here's water!";
            break;
        case 2:
            cout<<"Here's cola!";
            break;
        case 3:
            cout<<"Here's soda!";
            break;
        case 4:
            cout<<"Here's juice!";
            break;

        default:
            cout<<"You didn't select a valid option!";
            break;
    }

    return 0;
}
