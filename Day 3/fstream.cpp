#include <fstream>
using namespace std;

int main() {
    ifstream in("input.txt");
    ofstream out("output.txt");
    
    int k;
    in>>k;
    k = k * 2;
    
    out<<"POTATO!";
    out<<k<<endl; // endl changes lines
    out<<"PO"<<"TA"<<"TO"; // chaining << operators results in a "POTATO" output

    in.close();
    out.close(); // Close the stream when you're done with it.

    return 0;
}
