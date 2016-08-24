#include <iostream>
using namespace std;

int main() {
    int a=25;
    int *p; // Putting an asterisk behind p makes it a variable of type int*, meaning that it points to an int.

    p=&a;
    cout<<*p<<" at "<<p<<endl;

    *p=99; // We set the value at the index which p points to.
    cout<<a;
    return 0;
}
