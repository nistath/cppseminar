#include <iostream>
using namespace std;

int main() {
    int a[2][5] = {}; // = {} initializes all cells to 0

    a[1][4] = 35;
    a[0][0] = 5;

    cin>>a[1][1];

    cout<<a[1][1]<<" "<<a[0][0]<<" "<<a[1][4]<<" "<<a[1][0];
    return 0;
}
