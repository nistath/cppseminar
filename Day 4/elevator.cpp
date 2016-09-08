#include <iostream>
#include <algorithm>
#include <cmath>
using namespace std;

int main(){
    int n;
    cin>>n;

    int arr[n];
    for(int i=0; i<n; i++) cin>>arr[i];

    sort(arr, arr+n);

    int trips;
    int maxW = -1;
    if(n%2 == 0){
        trips = n/2;
    }
    else{
        trips = n/2 + 1;

        maxW = arr[n-1];
        n--;
    }

    //trips = ceil(n/2.0); ή trips = int(n/2.0 +1);


    for(int i=0; i<n/2; i++){
        int sum=arr[i]+arr[n-1-i];

        maxW = max(sum, maxW);
    }

    cout<<"Max weight: "<< maxW<<"\n";
    cout<<"Trips: "<< trips;
}
