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

int main() {
    Person home[3];
    home[0].name = "George";
    home[0].weight = 64;
    home[0].luckynumbers[0] = 7;

    home[1].name = "Annie";
    home[1].age = 17;
    home[1].luckynumbers[2] = 7;

    home[2].name = "John";
    home[2].height = 1.7853;

    cout<<home[0].name<<" "<<home[1].name<<" "<<home[2].name;
}
