def startState(domain,inputStates):
    dom = inputStates[-1]
    initial_probability = 1/len(inputStates)
    probab = [initial_probability]*len(inputStates)
    sumprob = [0]*256
    for d in dom:
        for i in range(len(inputStates)):
            if(d in inputStates[i]):
                sumprob[ord(d)] = sumprob[ord(d)] + probab[i]
    initState = sumprob.index(max(sumprob))
    return chr(initState)
inp1 = ['a','b','ac','abc','abcd','abcde']
domain = 5
print(startState(domain,inp1))
