import static org.junit.Assert.assertEquals;
import static org.junit.Assert.assertTrue;

import org.junit.Test;

public class SampleTest {
  @Test
  public void test1() throws Exception {
    assertEquals(1, Integer.parseInt("1"));
    assertTrue(1 < 2);
  }
}
