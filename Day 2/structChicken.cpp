#include <iostream>
#include <string>
using namespace std;

struct Chicken{
    string name;
    double weight;
    double height;

    Chicken* dad;
    Chicken* mom;
};

int main() {
    Chicken coop[4];

    coop[0].name = "Spock";

    coop[1].name = "Rooster";

    coop[2].name = "Cluck";
    coop[2].mom = &(coop[0]);
    coop[2].dad = &(coop[1]);

    coop[3].name = "Roo";
    coop[3].mom = &(coop[2]);
    coop[3].dad = &(coop[1]);

    cout<<coop[2].name<<"'s parents are: "<<(*coop[2].mom).name<<" and "<<(*coop[2].dad).name<<endl;

    cout<<coop[3].name<<"'s parents are: "<<(*coop[3].mom).name<<" and "<<(*coop[3].dad).name<<endl;

    return 0;
}
