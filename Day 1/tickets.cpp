#include <iostream>
using namespace std;

int main() {
    int n, a, b, c, d;
    int price;
    cin>>n>>a>>b>>c>>d;

    price=10*n;
    if(n>=a)
        price=n*9;
    if(price>b*8)
        price=b*8;
    if(n>=b)
        price=n*8;
    if(price>c*7)
        price=c*7;
    if(n>=c)
        price=n*7;
    if(price>d*5)
        price=d*5;
    if(n>=d)
        price=n*5;

    cout<<price;
    return 0;
}
