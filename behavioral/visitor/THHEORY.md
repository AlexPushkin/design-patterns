Definition
=
_Represent an operation to be performed on elements of an object structure. Visitor lets you define a new operation without changing the classes of the elements on which it operates._

Intent
=
1. Represent an operation to be performed on the elements of an object structure. Visitor lets you define a new operation without changing the classes of the elements on which it operates.
2. Do the right thing based on the type of two objects.
3. Double dispatch

Pros
=
1. Many unrelated operations on an object structure are required.
2. The classes that make up the object structure are known and not expected to change.
3. New operations need to be added frequently.
4. An algorithm involves several classes of the object structure, but it is desired to manage it in one single location.
5. An algorithm needs to work across several independent class hierarchies.

Cons
=
1. A drawback to this pattern, however, is that it makes extensions to the class hierarchy more difficult, as new classes typically require a new visit method to be added to each visitor.

Check list
=
1. Confirm that the current hierarchy (known as the Element hierarchy) will be fairly stable and that the public interface of these classes is sufficient for the access the Visitor classes will require. If these conditions are not met, then the Visitor pattern is not a good match.
2. Create a Visitor base class with a visit(ElementXxx) method for each Element derived type.
3. Add an accept(Visitor) method to the Element hierarchy. The implementation in each Element derived class is always the same – accept( Visitor v ) { v.visit( this ); }. Because of cyclic dependencies, the declaration of the Element and Visitor classes will need to be interleaved.
4. The Element hierarchy is coupled only to the Visitor base class, but the Visitor hierarchy is coupled to each Element derived class. If the stability of the Element hierarchy is low, and the stability of the Visitor hierarchy is high; consider swapping the 'roles' of the two hierarchies.
5. Create a Visitor derived class for each "operation" to be performed on Element objects. visit() implementations will rely on the Element's public interface.
6. The client creates Visitor objects and passes each to Element objects by calling  accept().

Rules of thumb
=
1. The abstract syntax tree of Interpreter is a Composite (therefore Iterator and Visitor are also applicable).
2. Iterator can traverse a Composite. Visitor can apply an operation over a Composite.
3. The Visitor pattern is like a more powerful Command pattern because the visitor may initiate whatever is appropriate for the kind of object it encounters.
4. The Visitor pattern is the classic technique for recovering lost type information without resorting to dynamic casts.
