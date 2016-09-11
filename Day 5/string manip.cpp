#include <iostream>
#include <string>

using namespace std;

int main(){
    string k = "abcdefghijklmnopqrstuvwxyz";
    for(unsigned int i = 0; i < k.size(); i++){
        k[i] = ((k[i] + 1 - 'a') % 26) + 'a';
    }

    cout<<k;
    return 0;
}
