#include <iostream>
#include <string>
using namespace std;

struct Person{
    int age;
    double height;
    long weight;
    string name;
    int luckynumbers[3];
};

int main(){
    Person a;

    a.name = "Anna";
    a.height = 1.60;

    a.luckynumbers[0]=5;

    if(a.name == "Anna"){
        cout<<"Hey Anna";
    }

    cout<<a.name<<" "<<a.height<<" "<<a.luckynumbers[0]<<"\n";

    Person k;
    k = a;

    k.name="John";
    cout<<a.name<<"\n"; // a has not changed!
    cout<<k.name<<" "<<k.height<<" "<<k.luckynumbers[0];
}
