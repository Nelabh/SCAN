import permute
import probability
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
    for index in range(total-1):
        inp1 = sorted(inp1, key=lambda x: len(x))
##        print("INITIAL")
##        print(initial)
##        print("FINAL")
##        print(final)
##        print("Input:")
##        print(inp1)
##        print("Input[index]:")
##        print(inp1[index])
        if initial[len(inp1[index])] == -1:
            #count number of (-1's) and then set value of index and index2 accordingly
            #then permute the values of the input domain and call recursively "query()"
            check1 = len(inp1[index])
            check2 = check1
            while check2 < domain and initial[check2] == -1 :
                check2 += 1
            index2 = initial[check2]
##            print(str(check2)+ " - " + str(check1) + " > 1")
##            print(inp1)
##            print("Input[index]:")
##            print(inp1[index])
##            print("Input[index2]:")
##            print(inp1[index2])
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
##                print(comparison)
##                print(diff)
                if( diff > 1):
##                    print("Input[index]:")
##                    print(inp1[index])
##                    print("Input[index2]:")
##                    print(inp1[index2])
                    combi = permute.permute(inp1[index],inp1[index2],comparison)
##                    print("Combi : ")
##                    print(combi)
                    count = len(inp1) 
                    for x in combi:
                        if x not in inp1:
                            inp1.append(x)
                            inp1 = sorted(inp1, key=lambda x: len(x))
                    count2 = len(inp1)
                    if(count2 > count):
                        query(inp1,domain)
                index2 = index2+1;
            
            

##            if check2 - check1 > 1:
##                print("Index 1")
##                print(inp1[index-1])
##                print("Index 2")
##                print(inp1[index2])
##                combi = permute.permute(inp1[index-1],inp1[index2],comparison)
##                count = len(inp1) 
##                for x in combi:
##                    if x not in inp1:
##                        inp1.append(x)
##                inp1 = sorted(inp1, key=lambda x: len(x))
##                count2 = len(inp1)
##                print(inp1)
##                #if(count2 > count):
                        #query(inp1,domain)
            #permute.permute(inp1[index],inp1[index2],comparison)
            #print("-1 encountered") #input data here itself else blunder!!!!
        else:

            index2 = initial[len(inp1[index])]
            while index2 < final[len(inp1[index])]:
                comparison = [0]*256
##                print("INDEX")
##                print(index)
##               
##                print("INDEX2")
##                print(index2)

                if(index2 >= len(inp1)):
                    break
                
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
                index2 = index2+1;
##    print("INITIAL")
##    print(initial)
##    print("FINAL")
##    print(final)
##    print("Input:")
##    print(inp1)
    return inp1

inp1 = ['a','b','ac','abcd','abcde']
domain = 5
states = query(inp1,domain)
print(states,end='')
