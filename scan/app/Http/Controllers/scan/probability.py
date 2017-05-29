def startState(domain,inputStates,dom,initial_probability,probab,init):
    sumprob = [0]*256
    k=0
    for d in dom:
        for i in range(len(inputStates)):
            if(d in inputStates[i] and init[k] == 0) :
                sumprob[ord(d)] = sumprob[ord(d)] + probab[i]
        k=k+1
    initState = sumprob.index(max(sumprob))
    ##print(sumprob)
   
    return chr(initState)
inp1 = ['a','b','ab','bc','abc','abcd','abcde']
domain = 5
print(startState(domain,inp1))
