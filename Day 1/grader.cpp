#include <iostream>
using namespace std;

int main() {
    int grade;
    cout<<"Enter your grade: ";
    cin>>grade;

    if(grade==100){
        cout<<"You got a perfect score!\n";
    }

    if(grade>=90){
        cout<<"You got an A!";
    }
    else if(grade>=80){
        cout<<"You got a B!";
    }
    else if(grade>=70){
        cout<<"You got a C!";
    }
    else if(grade>=60){
        cout<<"You got a D!";
    }
    else{
        cout<<"You got an F!";
    }

    return 0;
}
