#include <iostream>
using namespace std;

int main() {
    char array[20];
    array[0]='h';
    array[2]='!';
    array[10]='P';

    char *p;
    p=array;

    cout<<*p<<" "<<*(p+2)<<" "<<*(p+10);
    return 0;
}
