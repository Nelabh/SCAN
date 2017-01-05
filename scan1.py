import permute

def query(inp1,domain):
    total = len(inp1)
    initial = [-1]*domain
    i,j = 0,0
    final = [-1]*domain
    for index in range(total):
        if initial[len(inp1[index])-1] == -1:
            initial[len(inp1[index])-1] = index
            final[len(inp1[index])-1] = index
        else :
            final[len(inp1[index])-1] = index    
    print("INITIAL")
    print(initial)
    print("FINAL")
    print(final)
    print("Input:")
    print(inp1)
    for index in range(total-1):
        if initial[len(inp1[index])] == -1:
            index2 = initial[len(inp1[index])+1]
            #permute.permute(inp1[index],inp1[index2],comparison)
            #print("-1 encountered") #input data here itself else blunder!!!!
        else:
            index2 = initial[len(inp1[index])]
            while index2 <= final[len(inp1[index])]:
                comparison = [0]*256
                for check in range(len(inp1[index])):
                    if comparison[ord(inp1[index][check])] == 0:
                        comparison[ord(inp1[index][check])] = 1
                    elif comparison[ord(inp1[index][check])] == 1:
                        comparison[ord(inp1[index][check])] = 0
                for check in range(len(inp1[index2])):
                    #print(inp1[index2])
                    if comparison[ord(inp1[index2][check])] == 0:
                        comparison[ord(inp1[index2][check])] = 1
                    elif comparison[ord(inp1[index2][check])] == 1:
                        comparison[ord(inp1[index2][check])] = 0
                diff = 0
                for ini in range(256):
                    diff = diff + comparison[ini]
                #print(diff)
                if( diff > 1):
                    combi = permute.permute(inp1[index],inp1[index2],comparison)
                    count = len(inp1) 
                    for x in combi:
                        if x not in inp1:
                            inp1.append(x)
                    inp1 = sorted(inp1, key=lambda x: len(x))
                    count2 = len(inp1)
                    if(count2 > count):
                        query(inp1,domain)
                #break
                index2 = index2+1;
    return

inp1 = ['a','b','ac','abcd','abcde']
domain = 5
query(inp1,domain)
                
